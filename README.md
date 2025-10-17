# Web Security Experiment - DVWA

This repository contains the code snippets demonstrating the remediation of vulnerabilities for the Web Security experiment using the Damn Vulnerable Web Application (DVWA).

## Repository Structure

The `fixes` directory contains the source code for three vulnerabilities that were identified, exploited, and subsequently patched.

For each vulnerability, there are two files:

-   `low.php.before`: The original, vulnerable source code from the "low" security setting of DVWA.
-   `low.php.after`: The modified, secure source code after the remediation was applied.

### 1. SQL Injection
-   **Fix:** Replaced a vulnerable direct query with parameterized queries (prepared statements).

### 2. Reflected Cross-Site Scripting (XSS)
-   **Fix:** Implemented the `htmlspecialchars()` function to encode output and prevent script execution.

### 3. Command Injection
-   **Fix:** Implemented a blacklist to sanitize input by stripping out dangerous shell metacharacters.
