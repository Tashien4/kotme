## Свойства
Каждый класс может хранить некоторые данные или состояние в виде свойств. Свойства представляют переменные, определенные на уровне класса с ключевыми словами **val** и **var** (значение этих ключевх слов было пояснено в предыдущей лекции).
Свойство должно быть инициализировано, то есть обязательно должно иметь начальное значение.
Определим в классе NumInc два свойства: число **num** и шаг **step**:
```kotlin
class NumberInc {
    var num = 0
    var step = 5
}
```
Для того, чтобы воспользоваться свойством необходимо обратиться к его имени: `объект.свойство`, например `a.num`.

### Геттеры и сеттеры
Для каждого свойства класса можно определять геттер и сеттер.

**Геттер**
Геттер - это особая функция, привязанная к свойству, которая управляет получением значения свойства и определяется с помощью слова **get**. Сколько в классе свойств, столько и геттеров. 
В теле данной функции описывается, что необходимо сделать со значением поля, прежде чем его вернуть. Если достаточно просто вернуть значение, то явно `get()` можно не указывать.
В теле `get()` используется не само имя поля, а ключевое слово **field**:
```kotlin
class NumberInc {
    var num = 0
        get() {return field}
    var step = 5
        get() {return field}
}
```
Геттеры обычно используются, когда значение необходимо вычислить или изменить перед его возвратом.

Создадим еще одно свойство – **checkStep**, принимает значение true или false в зависимости от того, равен шаг двум или нет значение которого вычисляется в момент обращения к нему. Значение свойства вычисляется в момент обращения к нему.
```kotlin
class NumberInc {
    var num = 0
    var step = 5
    
    val checkStep: Boolean
        get(){
            return step != 2
        }
}
fun main() {
    val a =  NumberInc() //Создаем объект класса NumberInc
    println(a.checkStep) //Выводит на консоль true, так как шаг равен 5
}
```

**Сеттер**
Кроме геттера каждое поле имеет сеттер – метод `set()`, который определяет логику установки значения. Он вызывается, когда свойству присваивается новое значение.
В случае, когда можно явно не указывать, сеттер выглядит следующим образом:
```kotlin
class NumberInc {
    var num = 0
        set(value) {field = value}
    var step = 5
        set(value) {field = value}
}
```
Блок set определяется также, как и блок get, сразу после свойства, set() фактически является функцией, которая принимает один параметр - **value**.  Через этот параметр передается устанавливаемое значение. Например, когда выполняется выражение `a.num = 10`, то value присваивается 10. В теле set() значение присваивается полю. 
Например, необходимо, чтобы шаг мог устанавливаться только в четное число:
```kotlin
class NumberInc {
    var num = 0
    var step = 5
        set(value){
             if (step % 2 == 0)
                field = value
            else {
                field = value + 1
            }
        }
}
fun main() {
    val a =  NumberInc() //Создаем объект класса NumberInc
    a.step = 3 //Задаем значение шага
    println(a.step) //Выводит на консоль 4
}
```
Можно также одновременно использовать и геттер, и сеттер.

**Перегрузка операторов**
В Kotlin перегрузка операторов реализована на уровне соглашений - если у класса есть методы, определение которых начинается со слова `operator`, то они переопределяют какие-то существующие в языке операции. 

Рассмотрим перегрузку оператора доступа по индексу и присвоение значения по индексу с помощью квадратных скобок, то есть перегрузку оператора индекса.

Пусть к полям класса NumInc можно будет обращаться не только по их именам, но и по индексам. Полю num будет соответствовать индекс 0, а step – индекс 1.

Функция `get()` для доступа по индексу должна иметь один параметр – в нашем контексте индекс элемента. У функции присвоения по индексу  `set()` должно быть два параметра- индекс элемента и присваиваемое значение.
```kotlin
class NumInc{
     var num = 1
     var step = 5
     
    operator fun get(i: Int): Int? {
        when (i) {
            0 -> return num
            1 -> return step
            else -> return null
        }
    }

    operator fun set(i: Int, v: Int) {
        when (i) {
            0 -> number = v
            1 -> step = v
        }
    }
}
fun main() {
    val a = NumInc()
    a.num = 4
    a.step = 2
    println("${a.num}, ${a.step}") //Выводит 4, 2
    println("${a[0]}, ${a[1]}") //Выводит 4, 2
 
    a[0] = 15
    a[1] = 6
    println("${a[0]}, ${a[1]}") //Выводит 15, 6
}
```

С остальными операторами, которые можно перегрузить в Kotlin, можно ознакомиться в документации языка.