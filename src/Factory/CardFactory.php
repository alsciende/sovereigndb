<?

namespace App\Factory;

use App\Entity\Card;
use App\Service\JsonFinder;
use App\Service\JsonReader;

class CardFactory {
    public function __construct(private JsonFinder $jsonFinder, private JsonReader $jsonReader) {
    }

    public function load(string $fileName): Card {
        return new Card();
    }

    public function loadAll(string $directory): array {
        $filePaths = $this->jsonFinder->find($directory);

        foreach ($filePaths as $file) {
            $cards[] = $this->load($file);
        }

        return $cards;
    }
}