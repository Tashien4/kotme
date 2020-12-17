#### Функции

Объявление функции в Kotlin начинается с ключевого слова **fun**, после которого идет название функции. Далее в круглых скобках через запятую перечисляются параметры. Параметры функции записываются аналогично системе обозначений в языке Pascal, имя:тип, каждый параметр должен быть явно указан.  Тип возвращаемого значения функции указывается после списка параметров и отделяется от него двоеточием. После двоеточия указывается тип возвращаемого значения. Затем в фигурных скобках идет тело функции.

Пример функции:
```kotlin
fun sum(x: Int, y: Int): Int {
	return x + y
}
```

Функция sum, как и любая другая определенная функция (кроме main) сама по себе не выполняется. Чтобы ее выполнить, ее надо вызвать. Для вызова функции указывается ее имя (в данном случае "sum"), после которого в скобках идут значения параметров функции.

```kotlin
fun main() {
    val a = sum(13, 8)
    println(a) // 21
}
fun sum(x: Int, y: Int): Int {
	return x + y
}
```
В нашем примере функция sum принимает два параметра типа **Int**. Поэтому при вызове функции в скобках необходимо передать значения для этого параметра: `sum(13, 8)`. Причем эти значения должны представлять тип **Int**. Значения, которые передаются параметрам функции, еще называют аргументами.

#### Пакеты и импорт
Пакеты в Kotlin представляют собой логический блок, который объединяет функционал, например, классы и функции, используемые для решения близких по характеру задач и разделять фрагменты кода на логические составляющие. 
Для определения пакета применяется ключевое слово `package`, после которого идет имя пакета:
```kotlin
package animals
```

Для подключения сущности из пакета необходимо применить директиву `import`.
Функции верхнего уровня можно импортировать для сокращения кода.
```kotlin
import strings.lastChar
val c = "Cat".lastChar()
```
Можно подключить в целом весь пакет, после названия пакета ставится точка и звездочка:
```kotlin
import strings.*
val c = "Cat".lastChar()
```
По умолчанию в любой файл на языке Kotlin подключается ряд встроенных пакетов:
- kotlin.*
- kotlin.annotation.*
- kotlin.collections.*
- kotlin.comparisons.* 
- kotlin.io.*
- kotlin.ranges.*
- kotlin.sequences.*
- kotlin.text.*

Также в стандартной библиотке Kotlin есть пакет для работы с математическими функциями -  `kotlin.math`. Для того чтобы воспользоваться математическими функциями, пакет необходимо импротировать с помощью команды `import kotlin.math.*`.

Примеры функций из kotlin.math:
- abs(x: Int), abs(x: Double) – модуль
- sqrt(x: Double) – квадратный корень
- pow(x: Double, y: Double) – x в степени y
- sin/cos (x: Double) – синус / косинус, аргумент
задаётся в радианах
- exp(x: Double) – e в степени x
- log / log10(x: Double) – натуральный и
десятичный логарифмы
- min / max(x: Int, y: Int) или (x: Double, y: Double) –
минимум и максимум из двух чисел

Более подробно с пакетом математических функций можно ознакомиться в документации.

#### Числовые типы данных

В Kotlin, как и влюбом другом языке программирования, каждая переменная имеет определенный тип. Тип данных определяет, какие операции можно производить с данными этого типа.
Рассмотрим числовые типы:
1. Byte: хранит целое число от -128 до 127 и занимает 1 байт
1. Short: хранит целое число от -32768 до 32767 и занимает 2 байта
1. Int: хранит целое число от -2147483648 до 2147483647 и занимает 4 байта
1. Long: хранит целое число от –9 223 372 036 854 775 808 до 9 223 372 036 854 775 807 и занимает 8 байт
1. Float: хранит число с плавающей точкой от -3.4\*1038 до 3.4\*1038 и занимает 4 байта
1. Double: хранит число с плавающей точкой от ±5.0\*10-324 до ±1.7\*10308 и занимает 8 байта.