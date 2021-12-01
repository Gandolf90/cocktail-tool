<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mengen Model
 *
 * @property \App\Model\Table\RezepteTable&\Cake\ORM\Association\BelongsTo $Rezepte
 * @property \App\Model\Table\ZutatenTable&\Cake\ORM\Association\BelongsTo $Zutaten
 * @property \App\Model\Table\RezepteTable&\Cake\ORM\Association\HasMany $Rezepte
 *
 * @method \App\Model\Entity\Mengen newEmptyEntity()
 * @method \App\Model\Entity\Mengen newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Mengen[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mengen get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mengen findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Mengen patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mengen[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mengen|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mengen saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mengen[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Mengen[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Mengen[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Mengen[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MengenTable extends Table
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

        $this->setTable('mengen');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Rezepte', [
            'foreignKey' => 'rezept_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Zutaten', [
            'foreignKey' => 'zutat_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Rezepte', [
            'foreignKey' => 'mengen_id',
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
            ->decimal('menge')
            ->notEmptyString('menge');

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
        $rules->add($rules->existsIn('rezept_id', 'Rezepte'), ['errorField' => 'rezept_id']);
        $rules->add($rules->existsIn('zutat_id', 'Zutaten'), ['errorField' => 'zutat_id']);

        return $rules;
    }
}
