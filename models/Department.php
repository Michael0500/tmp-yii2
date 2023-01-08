<?php

namespace app\models;

/**
 * This is the model class for table "department".
 *
 * @property int $dept_id
 * @property int|null $dept_id_parent
 * @property string|null $departments
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dept_id_parent'], 'default', 'value' => null],
            [['dept_id_parent'], 'integer'],
            [['departments'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dept_id' => 'Dept ID',
            'dept_id_parent' => 'Dept Id Parent',
            'departments' => 'Departments',
        ];
    }

    public static function convert($array, $i = 'dept_id', $p = 'dept_id_parent')
    {
        if (!is_array($array)) {
            return array();
        } else {
            $ids = array();
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    if ((isset($v[$i]) || ($i === false)) && isset($v[$p])) {
                        $key = ($i === false) ? $k : $v[$i];
                        $parent = $v[$p];
                        $ids[$parent][$key] = $v;
                    }
                }
            }

            return (isset($ids[0])) ? self::convert_node($ids, 0, 'children') : false;
        }
    }

    public static function convert_node($index, $root, $cn)
    {
        $_ret = array();
        foreach ($index[$root] as $k => $v) {
            $_ret[$k] = $v;
            if (isset($index[$k])) {
                $_ret[$k][$cn] = self::convert_node($index, $k, $cn);
            }
        }

        return $_ret;
    }

    public static function out_tree_checkbox(array $array, $first = true)
    {
        if ($first) {
            $out = '<ul id="tree-checkbox" class="treeview">';
        } else {
            $out = '<ul>';
        }

        foreach ($array as $row) {
            $out .= '<li>';
            $out .= '<label><input type="checkbox" name="departments[]" value="' . $row['dept_id'] . '"> ' . $row['departments'] . '</label>';
            if (isset($row['children'])) {
                $out .= self::out_tree_checkbox($row['children'], false);
            }
            $out .= '</li>';
        }
        $out .= '</ul>';

        return $out;
    }
}
