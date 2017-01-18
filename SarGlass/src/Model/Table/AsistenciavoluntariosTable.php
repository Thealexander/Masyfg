<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Asistenciavoluntarios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Asistencias
 * @property \Cake\ORM\Association\BelongsTo $Colegios
 * @property \Cake\ORM\Association\BelongsTo $Clubs
 * @property \Cake\ORM\Association\BelongsTo $Voluntarios
 *
 * @method \App\Model\Entity\Asistenciavoluntario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Asistenciavoluntario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Asistenciavoluntario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Asistenciavoluntario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Asistenciavoluntario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Asistenciavoluntario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Asistenciavoluntario findOrCreate($search, callable $callback = null)
 */
class AsistenciavoluntariosTable extends Table
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

        $this->table('asistenciavoluntarios');

        $this->belongsTo('Asistencias', [
            'foreignKey' => 'PeriodosActividad_id'
        ]);
        $this->belongsTo('Colegios', [
            'foreignKey' => 'colegio_id'
        ]);
        $this->belongsTo('Clubs', [
            'foreignKey' => 'club_id'
        ]);
        $this->belongsTo('Voluntarios', [
            'foreignKey' => 'voluntario_id'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['PeriodosActividad_id'], 'Asistencias'));
        $rules->add($rules->existsIn(['colegio_id'], 'Colegios'));
        $rules->add($rules->existsIn(['club_id'], 'Clubs'));
        $rules->add($rules->existsIn(['voluntario_id'], 'Voluntarios'));

        return $rules;
    }
}
