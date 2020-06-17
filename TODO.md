# What's needs to be done?

- [x] Dokerfile for development
- [ ] Dockerfile for production
- [x] docker-compose for development
- [ ] docker-compose for production
- [x] registering accounts that are using the same email address as accounts signed in via socialite
- [ ] statistics should have collect ip addresses(hidden 2 last 127.0.X.X)+user-agents from redirects
- [ ] statistics should have pie chart with localization information about from what part of the world was redirect made
- [ ] statistics for hour/day/month for clicks example: how many people clicked link at 11:00pm
- [x] logo needs to be fixed
- [x] icon needs to be made
- [x] initial setup for ads before redirect
- [x] redirect config file should use ENV values
- [x] cannot login on accout that have the same email as from socialite but login normally(no provider)
- [x] redirect detecting user-agent like facebook or google should redirect with 302, without stalling for ads
- [x] dashboard and statistics should start at the top
- [x] save to clipboard doesn't work
- [x] Add README.md and installation info( and nginx-proxy info on install)
- [x] change redis logo in Features (served by http)

# v1.1
- [ ] suspicious redirects should be soft banned "YES! Take me back!"
- [ ] suspicious accounts should be soft banned
- [ ] payment plans for payed accounts
- [ ] cyclic payment plans