Feature: Lssettings plugin features BDD
  Test save config

  Scenario: save config string value
    Then check is plugin active "lssettings"

    Then save config data:
    | key | value |
    | module.topic.per_page | 2 |

    Then I am on homepage
    Then I should see in element by css "content .pagination" values:
    | value |
    | 2 |

  Scenario: not save config string value
    Then check is plugin active "lssettings"

    Then I am on homepage
    Then I should not see in element by css "content" values:
      | value |
      | <div class="pagination">

  Scenario: save config array value
    Then check is plugin active "lssettings"

    Then I am on "/people/"
    Then I should see in element by css "sidebar" values:
    | value |
    | <h3>Stats</h3> |

    Then save config data array
    Then I am on "/people/"
    Then I should not see in element by css "sidebar" values:
      | value |
      | <h3>Stats</h3> |
