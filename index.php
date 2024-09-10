<?php
require "../vendor/autoload.php";

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Create a log channel
$log = new Logger('ipt10');
$log->pushHandler(new StreamHandler('ipt10.log', Logger::DEBUG));

// Add records to the log
$log->warning('Kenneth Amurao');
$log->error('amurao.kenneth@auf.edu.ph');
$log->info('profile', [
    'student_number' => '22-0753-806',
    'college' => 'CCS',
    'program' => 'Information Technology',
    'university' => 'Angeles University Foundation'
]);

class TestClass
{
    private $logger;

    public function __construct($logger_name)
    {
        $this->logger = new Logger($logger_name);
        // Log that the class has been created
        $this->logger->info(__FILE__ . " Greetings to {$logger_name}");
    }

    public function greet($name)
    {
        // Provide a greeting message with the name of the invoker
        $message = "Hello, {$name}!";
        
        // Log it
        $this->logger->info(__METHOD__ . " Greetings to {$name}");

        return $message;
    }

    public function getAverage($data)
    {
        // Log it
        $this->logger->info(__CLASS__ . " get the average");

        // Compute the average and return it
        $average = array_sum($data) / count($data);
        return $average;
    }

    public function largest($data)
    {
        // Log it
        $this->logger->info(__CLASS__ . " Get the largest number");

        // Compute the largest number and return it
        $largest = max($data);
        return $largest;
    }

    public function smallest($data)
    {
        // Log it
        $this->logger->info(__CLASS__ . " Get the smallest number");

        // Compute the smallest number and return it
        $smallest = min($data);
        return $smallest;
    }
}

// Example usage
$my_name = 'Kenneth Amurao'; // Replace with your actual name
$obj = new TestClass('TestLogger');

echo $obj->greet($my_name) . PHP_EOL;

$data = [100, 345, 4563, 65, 234, 6734, -99];
echo "Average: " . $obj->getAverage($data) . PHP_EOL;
echo "Largest: " . $obj->largest($data) . PHP_EOL;
echo "Smallest: " . $obj->smallest($data) . PHP_EOL;

$log->info('data', $data);
$log->info('object', ['TestClass Object' => $obj]);