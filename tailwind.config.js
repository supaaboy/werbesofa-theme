
  
module.exports = {
    content: ["./src/**/*.php", "./src/**/*.js"],
    important: true,
    theme: {
        extend: {
            transitionTimingFunction: {
                'cubic': 'cubic-bezier(0.5,0.25,0,1)',
            }
        }
    }
}