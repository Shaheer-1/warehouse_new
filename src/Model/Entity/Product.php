<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property string $id
 * @property string $principal_id
 * @property string $sku
 * @property string $product_details
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Principal $principal
 * @property \App\Model\Entity\Cell[] $cells
 */
class Product extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'principal_id' => true,
        'sku' => true,
        'product_details' => true,
        'created' => true,
        'modified' => true,
        'principal' => true,
        'cells' => true,
        'id' => true,
    ];
}
