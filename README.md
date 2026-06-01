# tokidoki - тестовый проект для собеседования

Приложение на Symfony 8.1 / PHP 8.5: лоты с автомобилями с японского аукциона.
Стек: Symfony Messenger + Doctrine ORM (SQLite), тесты на zenstruck
(messenger-test, browser, foundry).

## Запуск

Всё работает в Docker. Из папки `.docker`:

```bash
cd .docker
docker compose up -d
docker compose exec php bin/console doctrine:fixtures:load --no-interaction
```

Приложение доступно на http://localhost:8080/

## Что есть

- `src/Entity/Lot.php` - сущность лота.
- `src/Message/LotMessage.php` - сообщение, приходящее из транспорта аукциона.
- `src/MessageHandler/LotMessageHandler.php` - обработчик входящего сообщения.
- `src/Controller/LotController.php` - `GET /` отдаёт список всех лотов в JSON.
- `src/Factory/LotFactory.php` - фабрика zenstruck/foundry, используется и фикстурами, и тестами.
- `src/DataFixtures/LotFixtures.php` - заполняет базу через фабрику (`bin/console doctrine:fixtures:load`).
- `tests/MessageHandler/LotMessageHandlerTest.php` - интеграционный тест хэндлера (zenstruck/messenger-test).
- `tests/Controller/LotControllerTest.php` - тест контроллера (zenstruck/browser).

## Задачи

1. Добавить эндпоинт "один лот по id", например `GET /lots/{id}`: возвращает лот в JSON и `404`, если лот не найден.
2. Добавить поле `vin` в `Lot`, в `LotMessage`. Дополнить `LotMessageHandlerTest`.
