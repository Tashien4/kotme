#### Массивы и коллекции

##### Массивы
Массив представляет набор данных одного типа. Массивы в Kotlin представлены классом Array.
Массив можно определить двумя способами - используя функцию `arrayOf()` либо с помощью конструктора `Array()` .

**Использование arrayOf()**
При использовании функции `arrayOf()`, в качестве аргумента функции передаются элементы массива:
```kotlin
val numbers = arrayOf(1, 2, 3, 4, 5)   //Неявное указание типа
val numbers = arrayOf<Int>(1, 2, 3, 4) //Явное указание типа
```
С помощью индексов можно обратиться к определенному элементу в массиве. Индексация начинается с нуля, то есть первый элемент будет иметь индекс 0. Индекс указывается в квадратных скобках.

**Использование конструктора Array()**
При использовании конструктора необходимо указать два параметра:
1. Размер массива
2. Функция, которая возвращает начальное значение каждого элемента по его индексу
```kotlin
//Создаёт массив со значениями [0, 2, 4, 6, 8]
val num = Array(5, { i -> i * 2 })
println(num[3]) //Выводит на консоль четвертый элемент массива
```
В приведенном выше примере был создан массив, состоящий из 5 элементов, в качестве второго параметра передано лямбда-выражение, которое принимает индекс элемента массива и возвращает значение, которое будет помещено в массив с этим индексом, в данном случае каждый элемент умножается на 2.

Kotlin также имеет некоторые встроенные фабричные функции для создания массивов примитивных типов данных:
- intArrayOf()
- byteArrayOf ()
- charArrayOf ()
- shortArrayOf ()
- longArrayOf ()

##### Коллекции
Коллекции используются для хранения групп связанных объектов.
Коллекции в Kotlin используют различные интерфейсы: Iterable, Collection, List, MutableIterable, MutableCollection и др.

Существуют изменяемые (mutable) и неизменяемые (immutable) коллекции. **Mutable-коллекция** может изменяться путем добавления, удаления или замены элемента. **Immutable-коллекция** не может изменяться и не иимеет этих вспомогательных методов.
Для создания различных типов коллекций есть разные функции.

**Списки**
Списки являются разновидностью коллекций. 
Списки - составной тип данных, элементы которого упорядочены, как в случае массивов. Однако списки могут содержать элементы разных типов, количество элементов в них можно менять, то есть добавлять и удалять.
В Kotlin интерфейс **List** предоставляет неизменяемую (immutable) коллекцию. Интерфейс List расширяет интерфейс Collection, поэтому перенимает его возможности

Для создания элемента list используется функция `listOf()`, который позволяет создать неизменяемый список:
```kotlin
var numbers: List<Int> = listOf(1, 2, 3, 4, 5)
//Перебор списка
for (num in numbers) {
    print("$num \t")
}
//Выводит: 1 2 3 4 5
```
Также можно создать список смешанного типа, передавая значения различных типов в listOf() качестве аргументов:
```kotlin
var listMixedTypes = listOf(«Tom», 12, 3.6)
```
Тип List позволяет получать данные с помощью различных методов. Основные из них
- get(index): возвращает элемент по индексу
- elementAt(index): возвращает элемент по индексу
- elementAtOrNull(index): возвращает элемент по индексу, если такого элемента не окажется, возвращает null
- first(): возвращает первый элемент
- last(): возвращает последний элемент
- indexOf(element): возвращает первый индекс элемента
- lastIndexOf(element): возвращает последний индекс элемента
- contains(element): возвращает true, если элемент присутствует в списке

**Изменяемые списки**
Изменяемые списки представлены интерфейсом **MutableList**, который расширяет интерфейс **List** и позволяют добавлять, удалять элементы. Данный интерфейс реализуется классом **ArrayList**.
Создавать изменяемые списки можно двумя методами:
- arrayListOf(): создает объект ArrayList
- mutableListOf(): создает объект MutableList

Создание изменяемых списков:
```kotlin
var numbers1 : ArrayList<Int> = arrayListOf(1, 2, 3)
var numbers2: MutableList<Int> = mutableListOf(4, 5, 6)
```
Для добавления или удаления элементов необходимо использовать методы **MutableList**:
- add(index, element): добавлят элемент по индексу
- add(element): добавляет элемент
- addAll(collection): добавляет коллекцию элементов
- remove(element): удаляет элемент
- removeAt(index): удаляет элемент по индексу
- clear(): удаляет все элементы коллекции