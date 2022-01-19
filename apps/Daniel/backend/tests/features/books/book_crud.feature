Feature: Book CRUD
  In order to create, edit, update and delete books
  As a user
  I need handle it

  Scenario: Create a student
    Given It should create a book:
    """
    {
      "id": "2a681bcd-df67-453c-a95f-81ead8362455",
      "name": "El principito",
      "author": "Antoine de Saint-Exupéry",
      "year": 1943
    }
    """
    Then I find a book with id "2a681bcd-df67-453c-a95f-81ead8362455"