SIDEBAR CSS:

#sidebar {

    /* position: fixed;
    height: 100vh;
    overflow-y: auto;
    overflow-x: hidden;
    top: 0;
    left: 0;

    width: 70px;
    min-width: 70px;
    z-index: 1000;
    transition: all 0.25s ease-in-out;
    -webkit-transition: all 0.25s ease-in-out;
    -moz-transition: all 0.25s ease-in-out;
    -ms-transition: all 0.25s ease-in-out;
    -o-transition: all 0.25s ease-in-out;

    display: flex;
    flex-direction: column;
    background: linear-gradient(to right, var(--primary-color-1), var(--primary-dark)); */

    box-sizing: border-box;
    background: linear-gradient(to right, var(--primary-color-1), var(--primary-dark)); 
    height: 100vh;
    width: 250px;
    padding: 5px 1em;
    border-right: 1px solid var(--line-clr);
    position: sticky;
    top: 0;
    align-self: start;

    transition: 300ms ease-in-out;
    -webkit-transition: 300ms ease-in-out;
    -moz-transition: 300ms ease-in-out;
    -ms-transition: 300ms ease-in-out;
    -o-transition: 300ms ease-in-out;

    overflow: hidden;
    text-wrap: nowrap;

}
/* New Element */
#sidebar.close{
  padding: 5px;
  width: 60px;
}


/* NEW ELEMENT */
#sidebar ul {
  list-style: none;
  padding: 0 !important;
}

/* NEW ELEMENT */
#sidebar > ul > li:first-child {
  display: flex;
  justify-content: flex-end;
  margin-bottom: 16px;

  .logo {
      font-weight: 600;
  }
}

/* NEW ELEMENT */
#sidebar ul li.active a{
  color: #ccc;

  i {
      fill: white;
  }
}


/* NEW ELEMENT */
#sidebar a, #sidebar .dropdown-btn, #sidebar .logo {
  border-radius: .5em;
  -webkit-border-radius: .5em;
  -moz-border-radius: .5em;
  -ms-border-radius: .5em;
  -o-border-radius: .5em;
  padding: .85em;
  color: var(--text-clr);
  text-decoration: none;
  display: flex;
  align-items: center;
  gap: 1em;
}

#sidebar .logo {
  color: #fff;
}

.dropdown-btn {
  width: 100%;
  text-align: left;
  background: none;
  border: none;
  font: inherit;
  cursor: pointer;
}

.main {
  padding: min(30px, 7%);
}


#sidebar i {
  flex-shrink: 0; /*prevent any distortion*/
  color: #fff;
  margin-right: 7px;
  /* margin-right: 10px; */
}

#sidebar a span, #sidebar .dropdown-btn span {
  flex-grow: 1;
  color: #fff;
}

#sidebar a:hover, #sidebar .dropdown-btn:hover {
  background-color: #0056B3;
}

/* dropdown */
#sidebar .sub-menu {

  display: grid;
  grid-template-rows: 0fr;
  transition: 300ms ease-in-out;
  -webkit-transition: 300ms ease-in-out;
  -moz-transition: 300ms ease-in-out;
  -ms-transition: 300ms ease-in-out;
  -o-transition: 300ms ease-in-out;

  > div {
      overflow: hidden;
  }
}

#sidebar .sub-menu.show {
  grid-template-rows: 1fr;
}

.dropdown-btn i {
  transition: 200ms ease;
  -webkit-transition: 200ms ease;
  -moz-transition: 200ms ease;
  -ms-transition: 200ms ease;
  -o-transition: 200ms ease;
}

.rotate i:last-child {
  rotate: -180deg; 
}

#sidebar .sub-menu a {
  padding-left: 3em;
  color: white;
  font-size: 0.95rem;
}

#toggle-btn {
  margin-left: auto;
  padding: 0.8em;
  border: none;
  border-radius: .5em;
  -webkit-border-radius: .5em;
  -moz-border-radius: .5em;
  -ms-border-radius: .5em;
  -o-border-radius: .5em;
  background: none;
  cursor: pointer;

  i {
      transition: rotate 150ms ease;
      -webkit-transition: rotate 150ms ease;
      -moz-transition: rotate 150ms ease;
      -ms-transition: rotate 150ms ease;
      -o-transition: rotate 150ms ease;
}
}

#toggle-btn:hover {
  background-color: #0056B3;
}



@media (max-width: 768px) {
  #sidebar {
      width: 100%;  /* Full width */
      height: auto; /* Adjust height */
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      border-right: none; /* Remove right border */
      border-bottom: 1px solid var(--line-clr); /* Add bottom border */
      display: flex;
      flex-direction: row; /* Align items in a row */
      align-items: center;
      justify-content: space-between;
      padding: 10px 15px;
      overflow-x: auto; /* Enable scrolling if needed */
  }

  #sidebar ul {
      display: flex;
      flex-direction: row;
      gap: 15px;
      list-style: none;
      padding: 0;
      margin: 0;
  }

  #sidebar ul li {
      display: inline-block;
  }

  #sidebar ul li a,
  #sidebar ul li button {
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 14px;
      padding: 10px;
  }

  /* Hide sub-menu by default */
  .sub-menu {
      display: none;
      position: absolute;
      top: 50px;
      left: 0;
      width: 100%;
      background: var(--primary-dark);
      padding: 10px;
      z-index: 100;
  }

  /* Show submenu on click */
  .sub-menu.active {
      display: block;
  }
}
