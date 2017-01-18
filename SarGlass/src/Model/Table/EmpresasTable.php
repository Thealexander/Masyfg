<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Empresas Model
 *
 * @method \App\Model\Entity\Empresa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Empresa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Empresa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Empresa|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Empresa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Empresa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Empresa findOrCreate($search, callable $callback = null)
 */
class EmpresasTable extends Table
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

        $this->table('empresas');
        $this->displayField('IdEmpresa');
        $this->primaryKey('IdEmpresa');
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
            ->integer('IdEmpresa')
            ->allowEmpty('IdEmpresa', 'create');

        $validator
            ->requirePresence('NombreEmpresa', 'create')
            ->notEmpty('NombreEmpresa');

        $validator
            ->requirePresence('NombreContacto', 'create')
            ->notEmpty('NombreContacto');

        $validator
            ->requirePresence('Telefono', 'create')
            ->notEmpty('Telefono');

        $validator
            ->requirePresence('Celular', 'create')
            ->notEmpty('Celular');

        $validator
            ->requirePresence('Direccion', 'create')
            ->notEmpty('Direccion');

        $validator
            ->requirePresence('DescripcionContacto', 'create')
            ->notEmpty('DescripcionContacto');

        $validator
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->boolean('Activo')
            ->requirePresence('Activo', 'create')
            ->notEmpty('Activo');

        return $validator;
    }
}
