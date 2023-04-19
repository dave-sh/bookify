import './App.css';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Navbar from './component/navbar';
import Home from './component/home';
import Vacation from './component/vacation';
import Vacations from './component/vacations';

function App() {
  return (
	<div>
      {
        <Router>
			<Navbar/>
          <Routes>
            <Route path="/home" element={<Home/>}></Route>
            <Route path="/vacations" element={<Vacations/>}></Route>
            <Route path="/vacation" element={<Vacation/>}></Route>
          </Routes>
        </Router>
  }
    </div>
  );
}
export default App;
