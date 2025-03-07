<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\EventInterface;
use Cake\Log\Log;
use ArrayObject;


/**
 * Cells Model
 *
 * @property \App\Model\Table\RackRowsTable&\Cake\ORM\Association\BelongsTo $RackRows
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsToMany $Products
 *
 * @method \App\Model\Entity\Cell newEmptyEntity()
 * @method \App\Model\Entity\Cell newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Cell> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cell get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Cell findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Cell patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Cell> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cell|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Cell saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Cell>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cell>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cell>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cell> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cell>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cell>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cell>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cell> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CellsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('cells');
        $this->setDisplayField('cell_code');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RackRows', [
            'foreignKey' => 'rack_row_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Products', [
            'foreignKey' => 'cell_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'cells_products',
        ]);
    }
    
    // public function beforeMarshal(EventInterface $event, $entity, ArrayObject $options)
    // {
    //     if ($entity['principal_id']) {
    //         $entity['products'] = [
    //             'principal_id' => $entity['principal_id'],
    //             'sku' => $entity['sku'],
    //             'product_details' => $entity['product_details'],

    //         ];
    //         // $entity['products'] = $entity['product'];
    //         // Log::debug('Entity before save: ' . $entity);
    //         // exit;
    //     }
    // }
    /**
     * beforeSave
     */
    public function beforeSave(EventInterface $event, $entity, $options)
    {
    //     // if ($entity->cell_code) {
    //     //     $entity->cell_code = $this->_newOldCodes($entity);
    //     // }
        if ($entity['cell_code'] && $entity['is_edit'] != 'edit') {
            $entity['product'] = $this->_buildProducts($entity);
            // $entity['products'] = $entity['product'];
            // Log::debug('Entity before save: ' . $entity);
            // exit;
        }
    //     // Debug the entity data 
   }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->uuid('rack_row_id')
            ->notEmptyString('rack_row_id','Please select a Row of a Rack.')
            ->notEmptyString('principal_id[]','Principal Name is required.')
            ->notEmptyString('sku[]','sku is required.')
            ->notEmptyString('product_details[]','Product Detail is required.');

        $validator
            ->scalar('cell_code[]')
            ->maxLength('cell_code[]', 255)
            ->requirePresence('cell_code', 'create')
            ->notEmptyString('cell_code[]','Cell Code is a must.')
            ->add('cell_code[]', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['cell_code']), ['errorField' => 'cell_code']);
        $rules->add($rules->existsIn(['rack_row_id'], 'RackRows'), ['errorField' => 'rack_row_id']);

        return $rules;
    }

    protected function _newOldCodes($entity){
        // $already_exist_cell_code = $entity->cell_code;
        // foreach ($entity->cell_code as $key => $value) {
        //     # code...

        // }
        $allCodes = array_map('trim', $entity->cell_code);
        $already_exist_cell_code = $this->find('id')
            ->where(['cell_code' => $allCodes]);
        Log::debug('entity: ' . json_encode($already_exist_cell_code));
        

    }

    protected function _buildProducts($entity)
    {
        $record = [
            'principal_id' => $entity['principal_id'],
            'sku' => $entity['sku'],
            'product_details' => $entity['product_details'],
        ];
        // Trim Products
        // $product_code_string = $entity->product_code_string;
        $record = array_map('trim', $record);
        // Remove all empty Products
        $record = array_filter($record);
        // Reduce duplicated Products
        // $newProducts = array_unique($newProducts);


        // find and remove duplicate Products using sku
        // foreach ($newProducts as $key => $value) {
            // $val = explode('@', $value);
            $product = $this->Products->find()
            ->where(['Products.sku' => $entity['sku']])
            ->first();
            if ($product) {
                // unset($newProducts[$key]);
                $out = $product;
            }else{
                $out = $record;
            }
        // }
        return $out;
    }
}
