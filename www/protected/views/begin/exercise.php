<style>
    body {
    font-size:20px;
    background-size: cover;
    position: relative;
    background-image: url('/kotme/www/images/for_game/fon.png');
}

label, textarea, button {
    display: block;
}

label {
    white-space: pre-wrap;
}

button {
  text-decoration: none;
  outline: none;
  display: inline-block;
  width: 200px;
    height: 60px;
    line-height: 60px;
    border-radius: 45px;
    margin: 10px 20px;
    font-size: 20px;
  text-transform: uppercase;
  text-align: center;
  font-weight: bold;
  color: black;
  background: #FFEB3B;
  box-shadow: 0 8px 15px rgba(0,0,0,.1);
  transition: .3s;
}

button:hover {
    background: #fcff35;
    box-shadow: 0 15px 20px rgb(229 122 46 / 40%);
    color: black;
    transform: translateY(-7px);
}

textarea {
    width: 800px;
    height: 200px;
    background-color: black;
    color: white;
}
    </style>
    <link rel="stylesheet" href="/kotme/www/codemirror/codemirror.css">
    <link rel="stylesheet" href="/kotme/www/codemirror/darcula.css">
    <script src="/kotme/www/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="/kotme/www/codemirror/codemirror.js"></script>
    <script type="text/javascript" src="/kotme/www/codemirror/clike.js"></script>
    <script type="text/javascript" src="/kotme/www/js/exercise.js"></script>

    <label id="desc"></label>
<textarea id="code"></textarea>
<button id="submit">Отправить</button>
<label id="status"></label>
