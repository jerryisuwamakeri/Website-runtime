Having CDNs going off got me mad pissed. I thought about making an API to run checks on URLs if they active or  not, then I made this.
This was built in PHP
So, this is way to go:
Create a new function: In your project directory, create a new directory named functions. Inside this directory, create a new file named check_url.php and paste your PHP script into it.
In this Repo are the HTML, CSS, JS and PHP API endpoint. So, cop it and Deploy your site: Once you have your PHP script in place, commit and push your changes to your Git repository. 
I am using Netlify to host this, Netlify will automatically detect the changes and start the deployment process.
Test your API endpoint: After deployment is complete, you should be able to access your API endpoint. Netlify will provide you with a URL for your site, and your API endpoint will be accessible at https://your-site-name.netlify.app/.netlify/functions/check_url.
Use your API endpoint: Update the JavaScript code in your landing page to make POST requests to your Netlify Functions endpoint (/api/check_url.php).
