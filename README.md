# The Competition
I'm going to build a simple to use platform in Laravel. I'll refactor it and as a result, this application will include the best Design patterns practices.

## What I'm building?
### The Competition (practical test)
There are five knights in the kingdom, suitors to the princess's hand. Each one of them has the following virtues, but in different proportions: Courage, Justice, Mercy, Generosity, Faith, Nobility, Hope.

Also, each one of them has different degrees of Strength, Defense and Battle strategy.

There will be 3 steps for the knights, in order to win the princess's hand:

1. First of all, a top of virtuosity will be made. The three most virtuous ones, meaning the ones with the highest average of virtues, will move on to the next stage.
2. The princess will receive a letter (electronic letter) with these details related to the winners of the first step: name, picture (random) and the virtue scores. This letter will provide her the possibility to exclude from the competition one of the three knights, according to her own preferences.
3. In the final step, a battle will take place after the princess has chosen who goes on in the competition and who does not. This battle will decide the winner of the princess’s hand.

#### The battle
I’ll have to simulate a battle between the two remaining knights.

There will be a total of four attacks.

The first attack is done by the player with the higher Battle strategy value. If both players have the same value, then the attack is carried on by the player with the highest Strength. After an attack, the players switch roles. The damage done by the attacker is calculated with the following formula:

Damage = (Attacker Strength) + (Attacker Strength * Battle strategy)/100 – (Defender Defense)  
Example: Damage = 80 + (80*40)/100 - 50

The damage is subtracted from the defender’s Health (at the beginning of the battle, both knights have 100 Health).  
Battle strategy regenerates for the Attacker after every attack.  
The battle ends after four attacks or when one of the knights’ Health drops below the value 20.

The application must output the results of each attack: what happened, the damage done, defender’s Health left.

The winner will be the knight with the bigger Health value at the end of the battle.

#### Instructions:
1. Generate random names for the knights (https://uinames.com or https://namefake.com or any other API).
2. Generate age between 20 and 25 for each of the knights.
3. Generate random integer values between 0 and 100 (percent) for each virtue, for each knight, based on the algorithm:  
   a) The older the knight, the more Courage, Justice and Faith he has;  
   b) The younger the knight, the more Mercy, Generosity and Hope he has;  
   c) Nobility is random, no matter the age.
4. Generate random integer values for Strength (60-100), Defense (20-60) and Battle strategy (20-40) based on the algorithm:  
   a) The older the knight, the better he is on Strength;  
   b) The younger the knight, the better he is on Defense;  
   c) Battle strategy is random, no matter the age.

#### Observations:
- the project must be implemented using Laravel framework;  
I should use:  
- MySQL Database to store the knights’ and the battle information;
- Laravel Eloquent for queries (casts, relationships and mutators);
- Laravel Notification to send the letter (email) to the princess.

#### What customer interested in:
- [ ] The correct functionality of the application;
- [ ] The clarity and logic of the code;
- [ ] The database architecture;
- [ ] The ergonomics of the program (validations, confirmations etc.);
- [ ] Reusability and scalability of my code;
- [ ] The visual aspect (the way the displayed information is organized; no design is required but something straight, aligned and unitary is needed; for example, Bootstrap 4 can be used);
- [ ] Any other functionality I find useful (implemented or proposed, depending on difficulty).
