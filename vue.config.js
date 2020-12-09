module.exports = {
    devServer: {
      proxy: {
        '^/api/': {
          target: 'http://localhost:80',
          changeOrigin: true, // so CORS doesn't bite us. 
        }
      }
    }
  }