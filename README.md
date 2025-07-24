# Sonarqube-docker


## 1. Project description

As an occasional developer, I have often worked on web application projects in PHP and Python. These projects sometimes involved thousands of lines of code and could contain cybersecurity vulnerabilities or potential long-term maintenance issues.

It was therefore important to rely on a tool to analyze the code and determine how to improve it, both in terms of security and robustness. **SonarQube** was chosen for several reasons: on the one hand, it allows an in-**depth analysis of code quality** by detecting bugs, vulnerabilities, poor-quality code, and duplications.

In addition, this tool, in its open-source "Community" edition, supports the **analysis of many languages** (Azure Resource Manager, CloudFormation, C#, CSS, Docker, Flex, Go, HTML, Java, JavaScript, Kotlin, Kubernetes/Helm, PHP, Python, Ruby, Scala, Secrets, Terraform, TypeScript, VB.NET, XML). SonarQube also provides a **clear and modern graphical interface**.

To ensure portability and reproducibility, the project is based on **Docker**.


## 2. how to install, test and use the project

   ### 2.1 Installation and test

   1. _docker compose up --build_
   2. _docker logs sonarscanner_
   3. Wait for message "ANALYSIS SUCCESSFUL, you can find the results at: http://sonarqube:9000/dashboard?id=test"
   4. Go to http://sonarqube:9000
   5. Default credentials are: admin, admin. Change to Admin1234567? for test purpose
   6. Check the analysis
  
   ### 2.2 How to analyze your project

   1. _docker compose down -v_ (if you tested before)
   2. Replace sonarqube-docker/project/restaurant with the folder you want to analyze
   3. _docker compose up --build_
   4. _docker logs sonarscanner_
   3. Wait for message "ANALYSIS SUCCESSFUL, you can find the results at: http://sonarqube:9000/dashboard?id=test"
   4. Go to http://sonarqube:9000
   5. Default credentials are: admin, admin. Change to Admin1234567? for test purpose
   6. Check the analysis
   7. Edit sonarqube-docker/project/sonnar-project.propreties and replace the admin password with the new one: Admin1234567?
   8. Now you can work on your own folder
   9. When you want to analyse the changes you made, just type _docker compose up sonarscanner_
   10. Wait for the new analysis to be done and successfull
   11. Refresh the page on http://sonarqube:9000 and you will see you modification in the analyzed codebase
    
## 3. Potential issues

For now, two issues have been identified: authentication to SonarQube or the SonarScanner analysis may potentially fail.

In that case, run the following commands:

   1. _docker compose down -v_
   2. _docker compose up --build_
   3. Follow steps from 2.1 or 2.2

## 4. Improvements

   1. After making changes in the working directory, it is necessary to run a new analysis to see the results in the web interface. Each analysis evaluates the entire folder as a whole. It would be interesting to find a way to analyze only the modified files.

