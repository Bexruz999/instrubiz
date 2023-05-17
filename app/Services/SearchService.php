<?php

namespace App\Services;


use App\Models\StoreCategory;
use App\Models\StoreProducer;
use App\Models\StoreProduct;

class SearchService
{
    protected $ravBody;
    public $searchCount;

    public function __construct()
    {
        $this->ravBody = "MATCH(name,short_description) AGAINST(? IN BOOLEAN MODE)";
        $this->ravProducer = "MATCH(name) AGAINST(? IN BOOLEAN MODE)";
        $this->searchCount = setting('search_count', 20);
    }

    private function searchQuery($q)
    {
        $query = mb_strtolower($q, 'UTF-8');
        $arr = explode(" ", $query);

        $query = [];
        foreach ($arr as $word) {
            $len = mb_strlen($word, 'UTF-8');
            switch (true) {
                case ($len <= 3):
                {
                    $query[] = $word . "*";
                    break;
                }
                case ($len > 3 && $len <= 6):
                {
                    $query[] = mb_substr($word, 0, -1, 'UTF-8') . "*";
                    break;
                }
                case ($len > 6 && $len <= 9):
                {
                    $query[] = mb_substr($word, 0, -2, 'UTF-8') . "*";
                    break;
                }
                case ($len > 9):
                {
                    $query[] = mb_substr($word, 0, -3, 'UTF-8') . "*";
                    break;
                }
                default:
                {
                    break;
                }
            }
        }
        $query = array_unique($query, SORT_STRING);
        $qQeury = implode(" ", $query);
        return $qQeury;
    }

    public function search(string $q)
    {
        $qQuery = $this->searchQuery($q);
        $results = StoreProduct::with(['category' => function ($query) {
            $query->select('id', 'slug');
        }])->whereRaw($this->ravBody, $qQuery)
            ->where('category_id', '>', '0')->paginate($this->searchCount);
        return $results;
    }

/*    public function alphapager(string $char, $model = null)
    {
        $qQuery = $this->searchQuery($char);
        $results = StoreProducer::whereRaw($this->ravProducer, $qQuery)->paginate(12);
        return $results;
    }*/
}
