Feature: Movie CRUD
  In order to create, edit, update and delete students
  As a user
  I need handle it

  Scenario: Creating a Movie
    Given It Should Create Movie With Request Value:
    """
    {
      "id": "670b9562-b30d-djaq-b827-655987665900",
      "name": "El Señor De Los Anillos",
      "duration": "02:58",
      "category": "Guerra",
      "releaseDate": "2001-12-19"
    }
    """
    Then I find a movie with id "670b9562-b30d-djaq-b827-655987665900"

