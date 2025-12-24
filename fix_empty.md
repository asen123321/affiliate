# BUG FIX: Object to String Conversion Error

**The Error:**
`Object of class Proxies\__CG__\App\Entity\Category could not be converted to string`

**Context:**
We recently updated the Controller to pass a full `Category` object (instead of just a slug string) to fix a SQL error. Now, the application (likely in a Twig template like `{{ category }}` or a QueryBuilder string concatenation) is trying to treat this Object as a String, which causes a crash.

**Task:**
Please update the `Category` entity to handle string conversion automatically.

**Steps:**
1.  **Open `src/Entity/Category.php`.**
2.  Add the `__toString()` magic method.
3.  It must return the category's **name**.

**Code to Implement:**
```php
public function __toString(): string
{
    return (string) $this->name;
}
