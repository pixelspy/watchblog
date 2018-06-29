import React,{ Component } 	from 'react';

class Button extends Component {
  style() {
    return {
      btn: {
        display: 'flex',
        justifyContent: 'center',
        alignItems: 'center',
        borderRadius: 25,
        border: '1px solid #dadada',
        cursor: 'pointer',
        background: '#fff'
      },
    }
  }

  render() {
    let { btn } = this.style();
    let {  buttonColor, width, padding, margin, style, noBorder } = this.props;
    return(
      <div
        style={{...btn,
        borderColor: noBorder ? 'none' : buttonColor ? buttonColor : 'inherit',
        color: buttonColor ? buttonColor : 'inherit',
        padding: padding ? padding : '10px 20px',
        width: width ? width : 'auto',
        margin: margin ? margin : '10 20 0 0',
        ...style
      }}
        onClick={this.props.onClick} >
        <img src={this.props.iconUrl}  style={{ paddingRight: 15, maxWidth: 65, maxHeight: 28 }} />
        <p>{this.props.text}</p>
      </div>
    );
  }
}

export default Button;
