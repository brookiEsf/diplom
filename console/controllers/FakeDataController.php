<?php
namespace console\controllers;
use console\models\Categories;
use Faker;
use Yii;
use yii\helpers\Console;
use yii\console\Controller;
use console\models\Products;
class FakeDataController extends Controller
{
    public function actionFaker()
    {
        //https://github.com/fzaninotto/Faker
        $faker = Faker\Factory::create();
        $testData = [];
        for ($i = 0; $i < 50; $i++) {
            $testData[] = [
                "address" => $faker->address,
                "city" => $faker->city,
                "phone" => $faker->phoneNumber,
                "text " => $faker->text(10),
                "image" => $faker->imageUrl(),
                'imageReal' => $faker->imageUrl(),
                'bankAccNumber' => $faker->bankAccountNumber,
                'number' => $faker->randomDigit,
                'float_lat' => $faker->randomFloat('9', '0', '180'),
                'float_lng' => $faker->randomFloat('9', '0', '180'),
                'random_element' => $faker->randomElement(['male', 'female', 'other']), //enum('male','female','other');
                'random_element_plural' => $faker->randomElements(['male', 'female', 'other'], 5, true),
                'created_at' => $faker->time(),
                'updated_at' => $faker->dateTime,
                'deleted_at' => rand(0, 1) ? $faker->dateTime('now', 'Europe/Berlin') : null,
                'paragraph' => $faker->paragraph,
                'country' => $faker->country,
                'country_c' => $faker->countryCode,
                'email' => $faker->email,
                'c_email' => $faker->companyEmail,
                'safe_email' => $faker->companyEmail,
                'active' => rand(0, 1) ? true : false,
                'password' => $faker->md5,
                'first_name' => $faker->firstName('male'),
                'first_name_female' => $faker->firstName('female'),
                'last_name' => $faker->lastName(),
            ];
        }
        for ($i = 1; $i < 50; $i++) {
            $category = new Categories();
            $category->setAttributes([
                'cat_name' => $faker->text(10),
                'cat_description' => $faker->text(100),
                'status' => rand(0, 1),
                'date_created' => $faker->unixTime,
                'date_updated' => $faker->unixTime,
                'date_deleted' => (rand(0, 1) ? $faker->unixTime : null)
            ]);
            $category->save(false);

            for ($j = 1; $j < 10; $j++) {
                $product = new Products();
                $product->setAttributes([
                    'prod_name' => $faker->text(20),
                    'prod_definition' => $faker->paragraph(),
                    'price' => rand(100, 10000),
                    'status' => rand(0, 1),
                    'date_created' => $faker->unixTime,
                    'date_updated' => $faker->unixTime,
                    'date_deleted' => (rand(0, 1) ? $faker->unixTime : null),
                ]);
                $product->save(false);
                $product->link('categories', Categories::findOne(1));
            }
        }
        if (file_put_contents('test-data.json', json_encode($testData))) {
            echo 'ok';
        } else {
            echo 'something goes wrong';
        }
    }
}