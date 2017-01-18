<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Personas Model
 *
 * @property \Cake\ORM\Association\HasMany $Asistenciapersonas
 * @property \Cake\ORM\Association\HasMany $Clubs
 * @property \Cake\ORM\Association\HasMany $Clubsvoluntarios
 * @property \Cake\ORM\Association\HasMany $Estudiantes
 * @property \Cake\ORM\Association\HasMany $Horariospersonas
 * @property \Cake\ORM\Association\HasMany $Pasantes
 * @property \Cake\ORM\Association\HasMany $Trabajadores
 *
 * @method \App\Model\Entity\Persona get($primaryKey, $options = [])
 * @method \App\Model\Entity\Persona newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Persona[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Persona|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Persona patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Persona[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Persona findOrCreate($search, callable $callback = null)
 */
class PersonasTable extends Table
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

        $this->table('personas');
        $this->displayField('Idpersona');
        $this->primaryKey('Idpersona');

        $this->hasMany('Asistenciapersonas', [
            'foreignKey' => 'persona_id'
        ]);
        $this->hasMany('Clubs', [
            'foreignKey' => 'persona_id'
        ]);
        $this->hasMany('Clubsvoluntarios', [
            'foreignKey' => 'persona_id'
        ]);
        $this->hasMany('Estudiantes', [
            'foreignKey' => 'persona_id'
        ]);
        $this->hasMany('Horariospersonas', [
            'foreignKey' => 'persona_id'
        ]);
        $this->hasMany('Pasantes', [
            'foreignKey' => 'persona_id'
        ]);
        $this->hasMany('Trabajadores', [
            'foreignKey' => 'persona_id'
        ]);
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
            ->integer('Idpersona')
            ->allowEmpty('Idpersona', 'create');

        $validator
            ->requirePresence('Nombresdepersona', 'create')
            ->notEmpty('Nombresdepersona');

        $validator
            ->requirePresence('ApellidosdePersona', 'create')
            ->notEmpty('ApellidosdePersona');

        $validator
            ->allowEmpty('NoCedula');

        $validator
            ->requirePresence('Direccion', 'create')
            ->notEmpty('Direccion');

        $validator
            ->allowEmpty('Celular');

        $validator
            ->allowEmpty('Telefono');

        $validator
            ->requirePresence('Genero', 'create')
            ->notEmpty('Genero');

        $validator
            ->requirePresence('Sexo', 'create')
            ->notEmpty('Sexo');

        $validator
            ->date('FechadeNacimiento')
            ->requirePresence('FechadeNacimiento', 'create')
            ->notEmpty('FechadeNacimiento');

        $validator
            ->requirePresence('PaisdeOrigen', 'create')
            ->notEmpty('PaisdeOrigen');

        $validator
            ->requirePresence('Nacionalidad', 'create')
            ->notEmpty('Nacionalidad');

        $validator
            ->allowEmpty('e-mail');

        $validator
            ->allowEmpty('FotodePerfil');

        $validator
            ->allowEmpty('tipodeimagen');

        $validator
            ->requirePresence('Estado', 'create')
            ->notEmpty('Estado');

        $validator
            ->dateTime('FechadeRegistro')
            ->allowEmpty('FechadeRegistro');

        $validator
            ->dateTime('Fechadeultimaactualizacion')
            ->allowEmpty('Fechadeultimaactualizacion');

        $validator
            ->allowEmpty('EstadoActual');

        return $validator;
    }
}
