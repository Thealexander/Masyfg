<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tiposdehogars Model
 *
 * @method \App\Model\Entity\Tiposdehogar get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tiposdehogar newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tiposdehogar[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tiposdehogar|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tiposdehogar patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tiposdehogar[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tiposdehogar findOrCreate($search, callable $callback = null)
 */
class TiposdehogarsTable extends Table
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

        $this->table('tiposdehogars');
        $this->displayField('idtipodeHogar');
        $this->primaryKey('idtipodeHogar');
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
            ->integer('idtipodeHogar')
            ->allowEmpty('idtipodeHogar', 'create');

        $validator
            ->requirePresence('tipodeHogar', 'create')
            ->notEmpty('tipodeHogar');

        return $validator;
    }
}
