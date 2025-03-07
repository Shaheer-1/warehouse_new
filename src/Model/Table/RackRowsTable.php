<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RackRows Model
 *
 * @property \App\Model\Table\CellsTable&\Cake\ORM\Association\HasMany $Cells
 *
 * @method \App\Model\Entity\RackRow newEmptyEntity()
 * @method \App\Model\Entity\RackRow newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\RackRow> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RackRow get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\RackRow findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\RackRow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\RackRow> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RackRow|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\RackRow saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\RackRow>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RackRow>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RackRow>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RackRow> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RackRow>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RackRow>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RackRow>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RackRow> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RackRowsTable extends Table
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

        $this->setTable('rack_rows');
        $this->setDisplayField('row_code');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Cells', [
            'foreignKey' => 'rack_row_id',
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
            ->scalar('row_code')
            ->maxLength('row_code', 255)
            ->requirePresence('row_code', 'create')
            ->notEmptyString('row_code')
            ->add('row_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['row_code']), ['errorField' => 'row_code']);

        return $rules;
    }
}
