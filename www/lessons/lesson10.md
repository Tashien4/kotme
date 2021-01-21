## Типобезопасные строители
Kotlin подходит для написания собственных DSL, также называемых типобезопасными строителями. 

DSL (domain-specific language) - это язык программирования, специально разработанный для решения определённого круга задач, в отличие от языков программирования общего назначения. Популярными примерами DSL являются SQL, регулярные выражения. Язык уменьшает объем предоставляемой функциональности, но при этом он способен эффективно решать определенную проблему.

Типобезопасные строители используются для генерации XML, вёрстки компонентов UI и многого другого.

### Ключевые инструменты
Вот основные языковые функции, которые позволят писать более чистый код на Kotlin и создавать свой собственный DSL:
| Инструмент                 | Синтаксис DSL         | Общий синтаксис |
| :-------------------:      | :-------------------: |:---------------:|
| Переопределение операторов | `collection += element` | `collection.add(element)` |
| Псевдонимы типа            | `typealias Point = Pair<Int, Int>`| Создание пустых классов-наследников|
| Соглашение для get/set методов| `map["key"] = "value"`| `map.put("key", "value")`|
| Мульти-декларации| `val (x, y) = Point(0, 0)`| `val p = Point(0, 0); val x = p.first; val y = p.second`|
| Лямбда за скобками| `list.forEach { ... }`| `list.forEach({...})`|
| Extention функции| `mylist.first(); // метод first() отсутствует в классе коллекции mylist`| Утилитные функции|
| Infix функции| `1 to "one"`| `1.to("one")`|
| Лямбда с обработчиком| `Person().apply { name = «John» }`| Нет|
| Контроль контекста| `@DslMarker`| Нет|

Более подробно с каждым из них можно ознакомиться в документации.

### Создание типобезопасных строителей
Пример типобезопасного строителя:
```kotlin
html {
    head {
        title {+"Текст"}
    }
    body {
        h1 {+"Текст"}
        p  {+"Текст"}
    }
}
```
Рассмотрим механизм реализации типобезопасных строителей в Kotlin. Прежде всего, нужно определить модель, которую необходимо строить. В данном случае это HTML-теги.
HTML — это класс, который описывает тэг `<html>`, то есть он определяет потомков, таких как `<head>` и `<body>`.

`html` является вызовом функции, которая принимает лямбда-выражение в качестве аргумента. Вот как эта функция определена:
```kotlin
fun html(init: HTML.() -> Unit): HTML {
    val html = HTML()
    html.init()
    return html
}
```
Эта функция принимает один параметр-функцию под названием `init`. Она создаёт новый экземпляр HTML, затем инициализирует его путём вызова функции, которая была передана в аргументе, и после этого возвращает его значение. Это в точности то, что и должен делать строитель.

Обращение (`head` и `body` — члены класса HTML):
```kotlin
html {
    head { /* ... */ }
    body { /* ... */ }
}
```

Функции head и body в классе HTML объявлены схоже с функцией html. Единственное отличие в том, что они добавляют отстроенные экземпляры в коллекцию `children` заключающего экземпляра HTML:
```kotlin
fun head(init: Head.() -> Unit) : Head {
    val head = Head()
    head.init()
    children.add(head)
    return head
}

fun body(init: Body.() -> Unit) : Body {
    val body = Body()
    body.init()
    children.add(body)
    return body
}
```

На самом деле эти две функции делают одно и тоже, поэтому можно использовать обобщённую версию, `initTag`:
```kotlin
protected fun <T : Element> initTag(tag: T, init: T.() -> Unit): T {
    tag.init()
    children.add(tag)
    return tag
}
```

Теперь наши функции выглядят следующим образом:
```kotlin
fun head(init: Head.() -> Unit) = initTag(Head(), init)

fun body(init: Body.() -> Unit) = initTag(Body(), init)
```

Можно их использовать для постройки тегов `<head>` и `<body>`

Добавление текста в тело тега осуществляется с помощью добавления строки и знака "+" перед текстом, что ведёт к вызову префиксной операции `unaryPlus()`. Эта операция определена с помощью функции-расширения `unaryPlus()`, которая является членом абстрактного класса `TagWithText`.
```kotlin
fun String.unaryPlus() {
    children.add(TextElement(this))
}
```