Project task:

Write an application that takes a string and returns the number of unique characters in the string.

It is expected that a string with the same character sequence may be passed several times to the method.
Since the counting operation can be time-consuming, the method should cache the results, so that when the method is given a string previously encountered, it will simply retrieve the stored result.
Use collections and maps where appropriate.
Write tests using phpunit.
E.g

"abbbccdf" => 3

a, d, f are present once.


For run app write command docker-compose up in cmd.

For run unit tests write command vendor\bin\phpunit up in cmd.

For run console version this app, there ara two options:
 - 1 write command php countunique
 - 2 write command php countunique "characters set"

(e.g. php countunique 123abc)


In second case you will immediately see the result

