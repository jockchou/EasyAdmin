<?php
/**
 * JockChou (http://jockchou.github.io)
 *
 * @link      https://github.com/jockchou
 * @copyright Copyright (c) 2016 JockChou
 * @license   http://www.apache.org/licenses/LICENSE-2.0.txt (Apache License)
 */

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "auth_item".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property string $auth_key
 * @property string $data
 * @property string $created_at
 * @property string $updated_at
 */
class Role extends ActiveRecord
{
    public static function tableName()
    {
        return "auth_item";
    }

    public function attributeLabels()
    {
        return [
            'name' => '名称',
            'type' => '类型',
            'description' => '描述',
            'rule_name' => '规则名',
            'data' => 'Data',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['created_at', 'updated_at'], 'default', 'value' => time()],
            [['type'], 'default', 'value' => 1]
        ];
    }

}