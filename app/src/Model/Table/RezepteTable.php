<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rezepte Model
 *
 * @property \App\Model\Table\MengenTable&\Cake\ORM\Association\BelongsTo $Mengen
 *
 * @method \App\Model\Entity\Rezepte newEmptyEntity()
 * @method \App\Model\Entity\Rezepte newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Rezepte[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rezepte get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rezepte findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Rezepte patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rezepte[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rezepte|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rezepte saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rezepte[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rezepte[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rezepte[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Rezepte[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RezepteTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('rezepte');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Mengen', [
            'foreignKey' => 'mengen_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('beschreibung')
            ->maxLength('beschreibung', 1000)
            ->requirePresence('beschreibung', 'create')
            ->notEmptyString('beschreibung');

        $validator
            ->scalar('anleitung')
            ->maxLength('anleitung', 1000)
            ->requirePresence('anleitung', 'create')
            ->notEmptyString('anleitung');

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
        $rules->add($rules->existsIn('mengen_id', 'Mengen'), ['errorField' => 'mengen_id']);

        return $rules;
    }
}
