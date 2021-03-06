### Классы и объекты
Kotlin поддерживает принципы объектно-ориентированного программирования, это значит, что программу на данном языке можно представить как совокупность  взаимодействующих объектов, причём каждый из этих объектов — это экземпляр определённого класса. 

Класс – обобщенное описание свойств и действий, которыми обладают объекты данного класса. То, что объект может сделать, — это его функции (в других языках программирования - методы). Они определяют поведение объекта и могут использовать свойства объекта.

В Kotlin принято классы определять в отдельных файлах. Однако можно создавать классы в том же файле, где находится точка входа в программу - функция `main()`.

Для объявления класса используется ключевое слово **class**, затем указывается имя класса. После имени идет  заголовок (указания типов его параметров, основного конструктора и т.п) и тело класса, заключённое в фигурные скобки. Заголовок, и тело класса являются необязательными составляющими. 
```kotlin
class NumberInc { 
}

//Если у класса нет тела, фигурные скобки могут быть опущены
class NumberInc
```
Класс фактически представляет новый тип данных, поэтому можно определять переменные этого типа:
```kotlin
fun main() {
    val a: NumberInc
    val b: NumberInc
}

class NumberInc
```
Для создания объекта класса необходимо вызвать конструктор данного класса. Конструктор фактически представляет функцию, которая называется по имени класса и которая выполняет инициализацию объекта.
```kotlin
fun main() {
    val a =  NumberInc()
    val b = NumberInc()
}

class NumberInc
```
В данном случае, `NumberInc()` представляет вызов конструктора, который создает объект класса **NumberInc**. До вызова конструктора переменная класса не указывает ни на какой объект.

Каждый класс может хранить некоторые данные или состояние в виде свойств. Свойства представляют собой переменные, определенные на уровне класса с ключевыми словами **val** и **var**. Если свойство задано ключевым словом **var**, то можно не только прочитать свойство, но и установить новое значение. Если же свойство определено с помощью ключевого слова **val**, то значение такого свойства можно задать только один раз.

Например, определим в классе NumInc два свойства: число **num** и шаг **step**, шаг будет фиксированным значением, а число изменяемым.
```kotlin
class NumberInc {
    var num = 0
    val step = 5
}
```
Также в классе можно определить функцию. Функции определяют поведение объекта. Создадим в классе NumInc функцию `inc()`, которая будет увеличивать число на значение шага:
```kotlin
class NumberInc {
    var num = 0
    val step = 5
    
    fun inc() {
        num += step
    }
}
```
Обратиться к свойству класса или вызвать функцию можно только через объект класса. Функция вызывается в нотации через точку: `объект.функция()`
```kotlin
fun main() {
    val a =  NumberInc() //Создаем объект класса NumberInc
    a.num = 10 //Задаем значение свойства num
    a.inc() //Вызываем функцию inc
    println("a = ${a.num}") //Выводит на консоль a = 15
}
class NumberInc {
    var num = 0
    val step = 5
    
    fun inc() {
        num += step
    }
}
```

Классы в Kotlin могут содержать следующие компоненты:
- Конструкторы и инициализирующие блоки
- Функции
- Свойства
- Вложенные классы
- Объявления объектов