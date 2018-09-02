Feature: Generate random Digit

  Scenario:
    When I request client for "faker.randomDigit" profile empty key
    Then should response be digit

  Scenario:
    When I request client for "faker.word" profile empty key
    Then should response be string