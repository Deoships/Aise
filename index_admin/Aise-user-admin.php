<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../img/A.svg">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!DOCTYPE html>
  <title>Админ-панель</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   
  <script src="../js/script.js"></script>
  <script>
    // Функция для обновления данных на странице
    function updateProducts() {
      $.ajax({
        url: "../php/get_products.php",
        type: "GET",
        success: function(data) {
          $("#productList").html(data);
        }
      });
    }

    // Отправка формы добавления продукта через AJAX
    $(document).on("submit", "#addProductForm", function(e) {
      e.preventDefault();
      $.ajax({
        url: "../php/add_product.php",
        type: "POST",
        data: $(this).serialize(),
        success: function(data) {
          alert(data);
          updateProducts();
        }
      });
    });

    // Отправка формы изменения продукта через AJAX
    $(document).on("submit", "#editProductForm", function(e) {
      e.preventDefault();
      $.ajax({
        url: "../php/edit_product.php",
        type: "POST",
        data: $(this).serialize(),
        success: function(data) {
          alert(data);
          updateProducts();
        }
      });
    });

    // Отправка формы удаления продукта через AJAX
    $(document).on("submit", "#deleteProductForm", function(e) {
      e.preventDefault();
      $.ajax({
        url: "../php/delete_product.php",
        type: "POST",
        data: $(this).serialize(),
        success: function(data) {
          alert(data);
          updateProducts();
        }
      });
    });

    // Обновление данных при загрузке страницы
    $(document).ready(function() {
      updateProducts();
    });
  </script>
</head>
<body>
  <h1>Админ-панель</h1>

  <!-- Форма для добавления продукта -->
  <h2>Добавить дом</h2>
  <form id="addProductForm">
    <label for="name">Название:</label>
    <input type="text" name="name" required><br>
    <label for="price">Цена:</label>
    <input type="text" name="price" required><br>
    <label for="description">Описание:</label>
    <textarea name="description" required></textarea><br>
    <label for="img">Изображение:</label>
    <input type="text" name="img" required><br>
    <input type="submit" value="Добавить продукт">
  </form>

  <!-- Форма для изменения продукта -->
  <h2>Редактировать дом</h2>
<form id="editProductForm">
  <label for="id">ID дома:</label>
  <input type="text" name="id" required><br>
  <label for="new_name">Новое название:</label>
  <input type="text" name="new_name"><br>
  <label for="new_price">Новая цена:</label>
  <input type="text" name="new_price"><br>
  <label for="new_description">Новое описание:</label>
  <textarea name="new_description"></textarea><br>
  <label for="new_img">Новое изображение:</label>
  <input type="text" name="new_img"><br>
  <input type="submit" value="Изменить продукт">
</form>

  <!-- Форма для удаления продукта -->
  <h2>Удалить дом</h2>
  <form id="deleteProductForm">
    <label for="id">ID продукта:</label>
    <input type="text" name="id" required><br>
    <input type="submit" value="Удалить продукт">
  </form>

  <!-- Список продуктов -->
  <h2>Список домов</h2>
  <div id="productList"></div>

  <h1>Запросы</h1>
    <p>Получить список всех домов в определенном районе</p>
    <button onclick="sendRequest(1)">Запрос 1</button>
    <p>Получить список всех клиентов, заинтересованных в домах определенного типа</p>
    <button onclick="sendRequest(2)">Запрос 2</button>
    <p>Получить список всех сделок, заключенных агентом недвижимости с определенным идентификатором</p>
    <button onclick="sendRequest(3)">Запрос 3</button>
    <p>Получить список всех домов с указанием их стоимости и агента недвижимости, ответственного за продажу</p>
    <button onclick="sendRequest(4)">Запрос 4</button>
    <p>Получить список всех клиентов, совершивших сделку на определенную сумму и с указанием дома, который был продан</p>
    <button onclick="sendRequest(5)">Запрос 5</button>
    <p>Получить список всех домов, доступных для продажи на определенную дату</p>
    <button onclick="sendRequest(6)">Запрос 6</button>
    <p>Получить список всех агентов недвижимости и общей суммы сделок, заключенных каждым агентом</p>
    <button onclick="sendRequest(7)">Запрос 7</button>
    <p>Получить список всех доступных домов определенного типа</p>
    <button onclick="sendRequest(8)">Запрос 8</button>
    <p>Получить список всех клиентов, у которых бюджет позволяет приобрести дома в определенном ценовом диапазоне</p>
    <button onclick="sendRequest(9)">Запрос 9</button>
    <p>Получить список всех домов, с указанием количества комнат и площади каждого дома, статуса продажи и стоимости</p>
    <button onclick="sendRequest(10)">Запрос 10</button>
   

    <div id="result"></div>

 
</body>
</html>
