const appDiv = "root";
// Both set of different routes and template generation functions

let home = "";
let about = "";
let products = "";
let companyProfile = "";
let contact = "";

const hl = document.getElementById("h-link");
const pl = document.getElementById("p-link");
const cpl = document.getElementById("cp-link");
const al = document.getElementById("a-link");
const cl = document.getElementById("c-link");

const loadPage = async (page) => {
  const response = await fetch(page);
  const resHtml = await response.text();
  return resHtml;
};

let routes = {};
let templates = {};
// Register a template (this is to mimic a template engine)
let template = (name, templateFunction) => {
  return (templates[name] = templateFunction);
};
// Define the routes. Each route is described with a route path & a template to render
// when entering that path. A template can be a string (file name), or a function that
// will directly create the DOM objects.
let route = (path, template) => {
  if (typeof template == "function") {
    sidebar.style.transform = "translateY(-100%)";
    sidebar.style.opacity = "0";
    return (routes[path] = template);
  } else if (typeof template == "string") {
    // sidebar.style.transform = "translateY(-100%)";
    // sidebar.style.opacity = "0";
    return (routes[path] = templates[template]);
  } else {
    return;
  }
};

function setDefaults() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}

// Register the templates.
template("register", async () => {
  home = await loadPage("./register.html");
  let myDiv = document.getElementById(appDiv);
  myDiv.innerHTML = home;

  setDefaults();

  return myDiv;
});

template("profile", async () => {
  products = await loadPage("./profile.html");
  let myDiv = document.getElementById(appDiv);
  myDiv.innerHTML = about;

  setDefaults();

  return myDiv;
});


template("login", async () => {
  about = await loadPage("./login.html");
  let myDiv = document.getElementById(appDiv);
  myDiv.innerHTML = about;

  
  setDefaults();

  return myDiv;
});


// Define the mappings route->template.
route("/", "register");
route("/login", "login");
route("/profile", "profile");
// Give the correspondent route (template) or fail
let resolveRoute = (route) => {
  try {
    return routes[route];
  } catch (error) {
    throw new Error("The route is not defined");
  }
};
// The actual router, get the current URL and generate the corresponding template
let getLocation = function(href) {
  var l = document.createElement("a");
  l.href = href;
  console.log("hi");
  return l;
};
let router = (evt) => {
  const url = (getLocation(window.location.href).pathname);
  console.log(window.location.hash.slice(1))
  const routeResolved = resolveRoute(url);
  routeResolved();
};
// For first load or when routes are changed in browser url box.
window.addEventListener("load", router);
window.addEventListener("hashchange", router);