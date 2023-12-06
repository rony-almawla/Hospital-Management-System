import logo from './logo.svg';
import './App.css';
import RegisterForm from './pages/Forms/Registerform';

function App() {
  return (
    <Router>
    <div>
      <nav>
        <ul>
          <li>
            <Link to="/">Log In</Link>
          </li>
          <li>
            <Link to="/about">Register</Link>
          </li>
          <li>
            <Link to="/contact">Contact</Link>
          </li>
        </ul>
      </nav>

      <hr />

      <Route exact path="/" component={<LoginForm/>} />
      <Route path="/about" component={<RegisterForm/>} />
      <Route path="/contact" component={Contact} />
    </div>
  </Router>
  
  );
}

export default App;
