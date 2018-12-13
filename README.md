# php-tools
Tool kit filled with super simple functions that I like to use when developing/debugging

---

### jecho($array)

ensure data is utf-8, echo formatted json in `<pre>` tags

```
@param $array - object or array
```
---

### precho($string)

wrap variable in `<pre>` tags

```
@param $string - anything that wouldn't break when you echo it
```
---

### hr($arg)

echo an `<hr>` tag, optional argument `$arg` specifies how many tags to echo

```
@param $arg - optional, default = 1, the number of tags to echo
```
---

### TimeTrial
This class will report microtime, useful for optimizing code

```php
$timer = new TimeTrial();
$timer->start;
// echo time when an event passes:
$timer->waypoint("Finished querying database");
// waypoint() also returns time, useful for incrementing during a loop
while(true) {
    // some task
    $loop_time += $timer->waypoint();
}
echo "Total time spent in loop: $loop_time";
// report the entire script time:
echo "Total time to run script: " . $timer->end();

```
