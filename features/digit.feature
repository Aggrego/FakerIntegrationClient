Feature: Generate random Digit

  Scenario:
    When I request client for "faker.digit" profile empty key
    Then should response be digit

  Scenario:
    When I request client for "faker.word" profile empty key
    Then should response be string