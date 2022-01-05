Feature: Student CRUD
  In order to create, edit, update and delete students
  As a user
  I need handle it

  Scenario: Creating a random student
    Given I send a request to StudentCreator with values:
    """
    {
      "id": "1aab45ba-3c7a-4344-8936-78466eca77fa",
      "name": "John Smith"
    }
    """
    Then I must find and stutend with id "1aab45ba-3c7a-4344-8936-78466eca77fa"

