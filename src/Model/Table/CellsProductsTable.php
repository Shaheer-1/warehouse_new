<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CellsProducts Model
 *
 * @property \App\Model\Table\CellsTable&\Cake\ORM\Association\BelongsTo $Cells
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\CellsProduct newEmptyEntity()
 * @method \App\Model\Entity\CellsProduct newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CellsProduct> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CellsProduct get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CellsProduct findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CellsProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CellsProduct> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CellsProduct|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CellsProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CellsProduct>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CellsProduct>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CellsProduct>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CellsProduct> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CellsProduct>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CellsProduct>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CellsProduct>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CellsProduct> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CellsProductsTable extends Table
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

        $this->setTable('cells_products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cells', [
            'foreignKey' => 'cell_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
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
            ->uuid('cell_id')
            ->notEmptyString('cell_id');

        $validator
            ->uuid('product_id')
            ->notEmptyString('product_id');

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
        $rules->add($rules->existsIn(['cell_id'], 'Cells'), ['errorField' => 'cell_id']);
        $rules->add($rules->existsIn(['product_id'], 'Products'), ['errorField' => 'product_id']);

        return $rules;
    }
}
