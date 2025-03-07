<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Principals Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $Products
 *
 * @method \App\Model\Entity\Principal newEmptyEntity()
 * @method \App\Model\Entity\Principal newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Principal> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Principal get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Principal findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Principal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Principal> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Principal|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Principal saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Principal>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Principal>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Principal>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Principal> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Principal>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Principal>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Principal>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Principal> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PrincipalsTable extends Table
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

        $this->setTable('principals');
        $this->setDisplayField('principal_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Products', [
            'foreignKey' => 'principal_id',
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
            ->scalar('principal_name')
            ->maxLength('principal_name', 255)
            ->requirePresence('principal_name', 'create')
            ->notEmptyString('principal_name')
            ->add('principal_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['principal_name']), ['errorField' => 'principal_name']);

        return $rules;
    }
}
