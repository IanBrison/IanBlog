<?php

namespace App\Infrastructure\Repository\Query\Mocks;

use App\Infrastructure\Repository\Entity\Mocks\DraftEntity;
use App\Infrastructure\Repository\Entity\Mocks\PostEntity;
use App\Infrastructure\Repository\Entity\Mocks\ThoughtEntity;
use App\Model\Read\Article;
use App\Model\ValueObject\Content;
use App\Model\ValueObject\Date;
use App\Model\ValueObject\Key;
use App\Model\ValueObject\Title;
use App\Service\Repository\Read\ArticleRepository;
use App\System\Exception\UnacceptableSettingException;
use Exception;
use Faker\Factory;

class ArticleQuery implements ArticleRepository {

    private $faker;

    public function __construct() {
        $this->faker = Factory::create();
    }

    /**
     * get all articles including the drafts
     * @return Article[]
     * @throws UnacceptableSettingException
     */
    public function getAll(): array {
        $articles = [];
        $maxNum = rand(1, 15);
        for ($num = 0; $num < $maxNum; $num++) {
            $articles[] = $this->createRandomArticle($num);
        }
        return $articles;
    }

    /**
     * @param int $articleId
     * @return Article
     * @throws UnacceptableSettingException
     */
    public function getById(int $articleId): Article {
        return $this->createRandomArticle($articleId);
    }

    /**
     * @param int $id
     * @return Article
     * @throws UnacceptableSettingException
     * @throws Exception
     */
    private function createRandomArticle(int $id): Article {
        $title = new Title($this->faker->words(rand(1,5), true));
        $content = new Content($this->faker->text);
        if (rand(0, 5) < 1) {
            return new DraftEntity($id, $title, $content);
        }
        $date = Date::createFromYYYY_MM_DD($this->faker->dateTimeBetween('-2 weeks')->format('Y-m-d'));
        if (rand(0, 3) < 3) {
            return new PostEntity($id, $title, $content, $date);
        }
        $key = new Key($this->faker->word);
        return new ThoughtEntity($id, $title, $content, $key, $date);
    }
}