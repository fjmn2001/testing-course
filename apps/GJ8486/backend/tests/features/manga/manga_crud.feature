Feature: Manga CRUD
  In order to create, edit, update and delete mangas
  As a user
  I need handle it

  Scenario: Creating a manga
    Given I send a request to MangaCreator with values:
    """
    {
      "id": "20202020202",
      "nombre": "Vinland Saga",
      "autor": "Makoto Yukimura",
      "estado": "En emisión"
    }
    """
    Then I must find and manga with id "20202020202"

