Feature: Generate random data that don't need arguments

  Scenario Outline: Request integer data formatter without arguments for default localization
    When I request client for "faker.<profile>" profile empty key
    Then should response be digit

    Examples:
      | profile     |
      | randomDigit |

  Scenario Outline: Request string data formatter without arguments for default localization
    When I request client for "faker.<profile>" profile empty key
    Then should response be string

    Examples:
      | profile                        |
      | word                           |
      | randomLetter                   |
      | timezone                       |
      | email                          |
      | safeEmail                      |
      | freeEmail                      |
      | companyEmail                   |
      | freeEmailDomain                |
      | safeEmailDomain                |
      | userName                       |
      | password                       |
      | domainName                     |
      | domainWord                     |
      | tld                            |
      | url                            |
      | slug                           |
      | ipv4                           |
      | localIpv4                      |
      | macAddress                     |
      | userAgent                      |
      | chrome                         |
      | firefox                        |
      | safari                         |
      | opera                          |
      | internetExplorer               |
      | creditCardType                 |
      | creditCardNumber               |
      | creditCardExpirationDateString |
      | creditCardDetails              |
      | swiftBicNumber                 |
      | hexcolor                       |
      | rgbcolor                       |
      | rgbColorAsArray                |
      | rgbCssColor                    |
      | safeColorName                  |
      | colorName                      |
      | fileExtension                  |
      | mimeType                       |
      | uuid                           |
      | ean13                          |
      | ean8                           |
      | isbn13                         |
      | isbn10                         |
      | boolean                        |
      | md5                            |
      | sha1                           |
      | sha256                         |
      | locale                         |
      | countryCode                    |
      | languageCode                   |
      | currencyCode                   |