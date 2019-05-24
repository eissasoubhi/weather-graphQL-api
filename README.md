# weather-graphQL-api

This is a Weather API Microservice using GraphQL and Symfony 4.   
It accepts a city name and return a pediction of its whether on a random day.    
### Usage: 
**Input**: city name and country code divided by comma, use ISO 3166 country codes.  
**Output**: One day weather prediction

## Installation

download the repo then:
- `$ cd weather-graphQL-api/`
- `$ composer install`
- `$ php bin/console server:run`

the Api is exposed on http://localhost:8000/weather/ (with a trailing slash).    
This url to work, expects a POST request with a parameter named *query* that contains the GraphQL query.

## Usage 

This is the schema and how to use it

**Input**: in the *Weather* parameter, pass the city name and country code divided by comma, use ISO 3166 country codes
**Output**: One day weather prediction

```graphql
type Query {
  weather: Weather(city: String!)
}

type Weather {
  date_timestamp: Int!
  date_text: String!
  condition: String! # sunny, couldy...
  description: String
  cloudiness: Int
  atmosphere: Atmosphere
  wind: Wind
}

type Atmosphere {
  temperature: Float!
  pressure: Float!
  sea_level: Float!
  grnd_level: Float!
  humidity: Float!
}

type Wind {
  speed: Float!
  degree: Float!
}
```

## Example

This is an example of the weather query

```graphql
 {
  weather(city: "fes,ma") {
    date_text
    condition
    description
    atmosphere {
      temperature
    }
  }
}
```

And this is the result:

```json
{
    "data": {
        "weather": {
            "date_text": "2019-05-26 12:00:00",
            "condition": "Clear",
            "description": "clear sky",
            "atmosphere": {
                "temperature": 301.751
            }
        }
    }
}
```

To see the results in action, you can use [Postman](https://www.getpostman.com/)! like in the image below or you can test it on local with the playground page http://localhost:8000/graphiql

![Demo](/demo.png)
