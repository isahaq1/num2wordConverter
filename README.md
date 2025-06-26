# Num2Str - Laravel Number to String Converter

Convert numbers into English or Bangla words easily in your Laravel application.

---

## 📦 Install Package

```bash
composer require isahaq/num2str

---

## 🚀 How to Implement

Make sure to import the class:

use Isahaq\Num2Str\Num2Str;

✅ Example 1: Using Dependency Injection in a Controller

 public function convert($number, Num2Str $converter)
    {
    //if you want to convert number to english string
        return $converter->convertEn((int) $number);

        //if you want to convert number to bangla string
        return $converter->convertBn((int) $number);
    }

✅ Example 2: Creating an Object Manually
$number = 50000;
$converter = new Num2Str();

// Convert to English
$result = $converter->convertEn((int) $number);

// Convert to Bangla
$result = $converter->convertBn((int) $number);

✅ Example 3: Using in Route Closure
    use Isahaq\Num2Str\Num2Str;

Route::get('/convert/{number}', function ($number, Num2Str $converter) {
    // Convert to English
    return $converter->convertEn((int) $number);

    // Convert to Bangla
    return $converter->convertBn((int) $number);
});



```
