const pjt = require("./project.json")
const path = require("path")
const MiniCssExtractPlugin = require("mini-css-extract-plugin")

module.exports = (env, argv) => ({
  devtool: argv.mode === "development" ? "source-map" : "",
  entry: ["./src/js/project.js", "./src/scss/project.scss"],
  output: {
    filename: `./${pjt.paths.dist}/assets/build/project-bundle.js`,
    path: path.resolve(__dirname)
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/env"]
          }
        }
      },
      {
        test: /\.css$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: "css-loader",
            options: {
              url: false,
              sourceMap: argv.mode === "development"
            }
          }
        ]
      },
      {
        test: /\.(sass|scss)$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: "css-loader",
            options: {
              url: false,
              sourceMap: argv.mode === "development",
              importLoaders: 2
            }
          },
          {
            loader: "postcss-loader",
            options: {
              sourceMap: argv.mode === "development"
            }
          },
          {
            loader: "sass-loader",
            options: {
              sourceMap: argv.mode === "development",
              sassOptions: {
                outputStyle: argv.mode === "development" ? "expanded" : ""
              }
            }
          }
        ]
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: `./${pjt.paths.dist}/assets/build/project-bundle.css`
    })
  ]
})
