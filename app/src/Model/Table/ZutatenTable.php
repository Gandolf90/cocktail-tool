<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Zutaten Model
 *
 * @property \App\Model\Table\RezepteTable&\Cake\ORM\Association\BelongsToMany $Rezepte
 *
 * @method \App\Model\Entity\Zutaten newEmptyEntity()
 * @method \App\Model\Entity\Zutaten newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Zutaten[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Zutaten get($primaryKey, $options = [])
 * @method \App\Model\Entity\Zutaten findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Zutaten patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Zutaten[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Zutaten|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Zutaten saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Zutaten[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Zutaten[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Zutaten[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Zutaten[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ZutatenTable extends Table
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

        $this->setTable('zutaten');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Rezepte', [
            'foreignKey' => 'zutat_id',
            'targetForeignKey' => 'rezept_id',
            'joinTable' => 'rezepte_zutaten',
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->decimal('preis')
            ->greaterThanOrEqual('preis', 0)
            ->notEmptyString('preis');

        $validator
            ->decimal('menge')
            ->greaterThanOrEqual('menge', 0)
            ->notEmptyString('menge');

        $validator
            ->scalar('einheit')
            ->maxLength('einheit', 50)
            ->requirePresence('einheit', 'create')
            ->notEmptyString('einheit');

        $validator
            ->decimal('alkoholgehalt')
            ->greaterThanOrEqual('alkoholgehalt', 0)
            ->notEmptyString('alkoholgehalt');

        $validator
            ->scalar('beschreibung')
            ->maxLength('beschreibung', 1000)
            ->requirePresence('beschreibung', 'create')
            ->notEmptyString('beschreibung');

        return $validator;
    }
}
