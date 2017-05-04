<?php

/**
 * Class Model_Modes
 */
class Model_Modes extends Model
{
    /**
     * @param array $item
     * @return bool|mixed
     */
    public function update(array $item)
    {
        $item = array_map("trim", $item);

        $old = $this->items->getItem($item['modeid']);
        unset($item['modeid']);

        if (!$old) {
            return FALSE;
        }
        foreach ($item as $key => $value) {
            $old->$key = $value;
        }
        return $old->save() ? $old : false;
    }

    /**
     * @return array
     */
    public function getAjax()
    {
        $items = parent::getAjax()['data'];
        $result = array();
        foreach ($items as $id => $item) {
            $result[] = array(
                'modeid' => $item->modeid,
                'fullname' => $item->fullname,
                'shortname' => $item->shortname,
                'description' => $item->description
            );
        }
        return array('data' => $result);
    }
}
