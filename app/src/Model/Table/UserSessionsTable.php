<?php
namespace App\Model\Table;

use App\Model\Entity\UserSession;
use Cake\Datasource\EntityInterface;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * @method UserSession get($primaryKey, $options = [])
 * @method UserSession newEntity($data = null, array $options = [])
 * @method UserSession[] newEntities(array $data, array $options = [])
 * @method UserSession save(EntityInterface $entity, $options = [])
 * @method UserSession patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method UserSession[] patchEntities($entities, array $data, array $options = [])
 * @method UserSession findOrCreate($search, callable $callback = null)
 */
class UserSessionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('user_sessions');
        $this->displayField('id');
        $this->primaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->uuid('user_id')
            ->allowEmpty('user_id');

        $validator
            ->allowEmpty('data');

        $validator
            ->integer('expires')
            ->requirePresence('expires', 'create')
            ->notEmpty('expires');

        return $validator;
    }
}
